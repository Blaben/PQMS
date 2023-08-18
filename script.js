
// Get all menu items with submenu
const menuItems = document.querySelectorAll('.dash-menu-item');

// Add event listeners for hover and focus
menuItems.forEach(item => {
    item.addEventListener('mouseenter', showSubmenu);
    item.addEventListener('mouseleave', hideSubmenu);
    item.addEventListener('focusin', showSubmenu);
    item.addEventListener('focusout', hideSubmenu);
});

function showSubmenu(event) {
    const submenu = event.currentTarget.querySelector('.dash-submenu');
    if (submenu) {
        submenu.style.display = 'block';
    }
}

function hideSubmenu(event) {
    const submenu = event.currentTarget.querySelector('.dash-submenu');
    if (submenu) {
        submenu.style.display = 'none';
    }
};


//Creating the popup for the manage data
//===========================================================

document.addEventListener("DOMContentLoaded", function () {
    const showUserFormBtn = document.getElementById("showUserForm");
    const showQuestionFormBtn = document.getElementById("showQuestionForm");
    const showDeleteFormBtn = document.getElementById("showDeleteForm");
    const showViewFormBtn = document.getElementById("showViewForm");

    const userForm = document.getElementById("UserForm");
    const questionForm = document.getElementById("QuestionForm");
    const deleteForm = document.getElementById("DeleteForm");
    const viewForm = document.getElementById("ViewForm");

    const closeUserFormBtn = document.getElementById("closeUserForm");
    const closeQuestionFormBtn = document.getElementById("closeQuestionForm");
    const closeDeleteFormBtn = document.getElementById("closeDeleteForm");
    const closeViewFormBtn = document.getElementById("closeViewForm");
    

    showUserFormBtn.addEventListener("click", function (event) {
        event.preventDefault();
        userForm.style.display = "block";
        questionForm.style.display = "none";
        deleteForm.style.display = "none";
        viewForm.style.display = "none";

    });

    showQuestionFormBtn.addEventListener("click", function (event) {
        event.preventDefault();
        questionForm.style.display = "block";
        userForm.style.display = "none";
        deleteForm.style.display = "none";
        viewForm.style.display = "none";
    });

    showDeleteFormBtn.addEventListener("click", function (event) {
        event.preventDefault();
        deleteForm.style.display = "block";
        questionForm.style.display = "none";
        userForm.style.display = "none";
        viewForm.style.display = "none";
    });

    showViewFormBtn.addEventListener("click", function (event) {
        event.preventDefault();
        viewForm.style.display = "block";
        deleteForm.style.display = "none";
        questionForm.style.display = "none";
        userForm.style.display = "none";
    });

    closeUserFormBtn.addEventListener("click", function () {
        userForm.style.display = "none";
    });

    closeQuestionFormBtn.addEventListener("click", function () {
        questionForm.style.display = "none";
    });

    closeDeleteFormBtn.addEventListener("click", function () {
        deleteForm.style.display = "none";
    });

    closeViewFormBtn.addEventListener("click", function () {
        viewForm.style.display = "none";
    });

    document.addEventListener("click", function (event) {
        if (
            event.target === userForm ||
            event.target === questionForm || 
            event.target === deleteForm ||
            event.target === viewForm
        ) {
            userForm.style.display = "none";
            questionForm.style.display = "none";
            deleteForm.style.display = "none";
            viewForm.style.display = "none";
        }
    });
});



