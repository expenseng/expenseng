<template>
    <div class="col-md-9">
        <p class="text-left float-left">
            Help us populate this company's section 
            <a href="#" @click="show = !show"> by suggesting a board member </a> 
            that may be missing on this page.
        </p>
        <div class="card col-md-12 py-4 d-flex flex-row" v-if="show">
            <div class="col-md-3">
                <label for="picture">Profile Picture</label>
                <div class="picture-area border-info">
                    <input type="file" accept="image/*" id="avatar" v-if="uploadImage" @change="preview" class="form-control">
                    <img :src="form.avatar" alt="" v-if="!uploadImage">
                </div>
                <button class="mt-2 btn btn-danger btn-sm" v-if="!uploadImage" @click="changeImage">Change</button>

            </div>
            <div class="col-md-9">
                <form method="POST" @submit.prevent="submit" enctype="form-data/multipart">
                <span class="text-muted text-right w-full">Required fields are marked (*)</span>
                <!-- Company information -->
                <div class="row pb-4">
                    <div class="col">
                        <label for="name">Full Name *</label>
                        <input type="text" v-model="form.name" required class="form-control" id="name" placeholder="First name">
                    </div>
                    <div class="col">
                        <label for="position">Position *</label>
                        <input type="text" v-model="form.position" required class="form-control" placeholder="Position" id="position">
                    </div>
                </div>
                <!-- Socials -->
                <div class="row pb-4">
                    <div class="col">
                        <label for="linkedin">LinkedIn</label>
                        <input type="text" v-model="form.linkedin" class="form-control" placeholder="LinkedIn" id="linkedin">
                    </div>
                    <div class="col">
                        <label for="email">Email *</label>
                        <input type="email" v-model="form.email" class="form-control" id="email" placeholder="Email address">
                    </div>
                </div>
                <!-- More socials -->
                <div class="row pb-4">
                    <div class="col">
                        <label for="twitter">Twitter</label>
                        <input type="text" v-model="form.twitter" class="form-control" placeholder="Twitter URL" id="twitter">
                    </div>
                    <div class="col">
                        <label for="website">Website</label>
                        <input type="url" v-model="form.website" class="form-control" id="website" placeholder="Website URL">
                    </div>
                    <div class="col">
                        <label for="facebook">Facebook</label>
                        <input type="url" v-model="form.facebook" class="form-control" id="facebook" placeholder="Facebook URL">
                    </div>
                </div>
                    <!-- Submit -->
                    <input type="submit" class="form-control" value="Submit">
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import Form from '../../Helpers/Form';

export default {
    name: "Suggest",
    
    props:{
        company:{
            type: String,
            required: true,
        }
    },

    data() {
        return {
            fileReader: new FileReader(),
            uploadImage: true,
            form: new Form({
                name: '',
                email: '',
                avatar: '',
                position: '',
                linkedin: '',
                facebook: '',
                twitter: '',
                website: '',
                company_id: this.company,
            }),
            show: false,
        }
    },

    methods: {
        preview(event){
            this.uploadImage = false;

            this.fileReader.onload = () => {
                this.form.avatar = this.fileReader.result;
            }

            this.fileReader.readAsDataURL(event.target.files[0]);
        },

        changeImage(){
            this.uploadImage = true;
            this.form.avatar = null;
        },

        submit(){
            this.form.post('/api/companies/'+this.company+'/board/suggest').then((result) => {
                console.log(result);
            }).catch((err) => {
                console.log(err);
            });
        }
    },
}
</script>

<style scoped>
    .picture-area{
        border: 1px solid;
        display: flex;
        justify-content: center;
        overflow: hidden;
        height: 160px;
        max-height: 160px;
        align-items: center;
    }

    .picture-area img{
        height: 100%;
        width: auto;
    }
</style>