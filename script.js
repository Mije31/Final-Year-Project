function showForm(formId) {
    document.querySelectorAll(".form-box").forEach(form => form.classList.remove("active"));
    document.getElementById(formId).classList.add("active"); 
}

function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
    }