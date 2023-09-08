const buttons = document.querySelectorAll('.nav_btn');

const panels = document.querySelectorAll('.target');

const buttons_staff = document.querySelectorAll('.btn-staff');

const panels_staff = document.querySelectorAll('.panel-staff');

const course_btn = document.querySelectorAll('.course-btn');

const course_panel = document.querySelectorAll('.course-panel');
buttons.forEach(button_clicked => {
    button_clicked.addEventListener("click", () => {
        const selected = document.querySelectorAll('.selected');

        selected.forEach(btn => {
            btn.classList.remove("selected")
        })
        button_clicked.classList.add("selected")
    })

})
course_btn.forEach(button_clicked => {
    button_clicked.addEventListener("click", () => {
        const selected = document.querySelectorAll('.course-btn-selected');

        selected.forEach(btn => {
            btn.classList.remove("course-btn-selected")
        })
        button_clicked.classList.add("course-btn-selected")
    })

})
buttons_staff.forEach(button_staff => {
    button_staff.addEventListener("click", () => {
        let selected_staff = document.querySelectorAll('.btn_side_selected')
        selected_staff.forEach(btn => {
            btn.classList.remove("btn_side_selected")
        })
        button_staff.classList.add('btn_side_selected')
    })
})



document.addEventListener("click", () => {
    for (let i = 0; i < buttons.length; i++) {
        if (buttons[i].classList.contains("selected")) {
            panels[i].classList.add("target-selected");
        } else {
            panels[i].classList.remove("target-selected");
        }


        if (buttons_staff[i].classList.contains("btn_side_selected")) {
            panels_staff[i].classList.add("staff-active");
        } else {
            panels_staff[i].classList.remove("staff-active");
        }


        if (course_btn[i].classList.contains("course-btn-selected")) {
            course_panel[i].classList.add("course-panel-selected");
        } else {
            course_panel[i].classList.remove("course-panel-selected");
        }

    }
})


// const buttons_side = document.querySelectorAll('.btn-option');
// buttons_side.forEach(button_clicked => {
//     button_clicked.addEventListener("click", () => {
//         const selected = document.querySelectorAll('.btn_side_selected');
//         selected.forEach(btn => {
//             btn.classList.remove("btn_side_selected")
//         })
//         button_clicked.classList.add("btn_side_selected")
//     })
// })
