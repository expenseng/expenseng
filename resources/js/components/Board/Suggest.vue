<template>
    <div>
        <p>
            Help us populate this company's section 
            <a href="#" @click="show = !show"> by suggesting a board member </a> 
            that may be missing on this page.
        </p>
        <div class="card col-md-12 py-4" v-if="show">
            <div class="form-group">
                <div class="col-md-2">
                    <label for="picture">Profile Picture</label>
                    <img :src="form.avatar" alt="" srcset="">
                </div>
                <div class="col-md-10">
                    <form>
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
                            <label for="facebook">Facebook</label>
                            <input type="url" v-model="form.facebook" class="form-control" id="facebook" placeholder="Facebook URL">
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
                    </div>
                        <!-- Submit -->
                        <input type="submit" class="form-control" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Form from '../../Helpers/Form';

export default {
    name: "Suggest",
    data() {
        return {
            form: new Form({
                name: '',
                position: '',
                linkedin: '',
                facebook: '',
                twitter: '',
                website: '',
            }),
            show: false,
        }
    },
}
</script>