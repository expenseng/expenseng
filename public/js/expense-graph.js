/* *********************8 Tabs ******************* */

function setupTabs () {
    document.querySelectorAll('.tabs-button').forEach(button => {
        button.addEventListener('click', () => {
            const sideBar = button.parentElement;
            const tabsContainer = sideBar.parentElement;
            const tabNumber = button.dataset.forTab;
            const tabToActivate = tabsContainer.querySelector(`.tabs-content[data-tab="${tabNumber}"]`);

            sideBar.querySelectorAll(".tabs-button").forEach(button => {
                button.classList.remove("tabs-button--active");
            });

            tabsContainer.querySelectorAll(".tabs-content").forEach(tab => {
                tab.classList.remove("tabs-content--active");
            });

            button.classList.add("tabs-button--active");
            tabToActivate.classList.add('tabs-content--active');

        });
    });
};

document.addEventListener("DOMContentLoaded", () => {
    setupTabs();

    document.querySelectorAll('.tabs').forEach(tabsContainer => {
        tabsContainer.querySelector(".tab-sidebar .tabs-button").click();
    });
});

/* **************** Navbar  **************** */

const calendar = document.querySelector('.calendar');
const calendarBtn = document.querySelector('.calendar-btn');


function toggleBtn(){

    if(calendar.classList.contains('d-none')){
        calendar.classList.remove('d-none');
    } else{
        calendar.classList.add('d-none');
    }
}

calendarBtn.addEventListener('click', toggleBtn);