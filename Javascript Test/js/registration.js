var array = [];
var hasMatch = false;

function addElement() {
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var confirm_password = document.getElementById('confirm_password').value;
    var city = document.getElementById('city').value;
    var state = document.getElementById('state').value;



    if(password !== confirm_password) {
        alert("Does not match password and confirm password!");
    }
    if(name.length && email.length && password.length && confirm_password.length && city.length && state.length < 1) {
        alert("Fill the foem first!");
    } else {

    var admin = {
        name: name,
        email: email,
        password: password,
        city: city,
        state: state
    };

    if (localStorage.getItem('array')) {
        array = JSON.parse(localStorage.getItem('array'));
    }

    function check_user_register() {
        for (var index = 0; index < array.length; ++index) {

            var temp = array[index];

            if (temp.email == email) {
                hasMatch = true;
                alert("admin already exist with same email");
                break;
            }
            else {

            }
        }
    }
    check_user_register();
    if (hasMatch === false) {
        array.push(admin);
        console.log(array);
        localStorage.setItem("array", JSON.stringify(array));
        var message = window.confirm("registerd successfully");
        if (message) {
            window.location.href = "login.html";
        }
    }
};

};