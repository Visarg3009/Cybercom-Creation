/* If else statement */
/*
var a = 10;
var b = 12;

if(a{>b){
    alert(true);
}
else{
    alert(false);
}

var a = true;

if(a)
{
    alert(true);
}
else{
    alert(false);
}
*/
/* Boolean logic */
/*
var firstname = 'Bruno';
var age = prompt('Enter the age');

if(age < 13){
    alert(firstname + ' is a boy');
} else if(age >= 13 && age < 20){
    alert(firstname + ' is a teenager');
} else if(age >= 20 && age < 30){
    alert(firstname + ' is a young man');
} else{
    alert(firstname + ' is a man');
}

*/

/* Ternary Operator and Switch Statments */
/*
var firstName = 'Bruno';
var age = prompt('Enter the age');

age >= 18 ? alert(firstName + ' drinks coffee')
: alert(firstName + ' drinks juice');
*/

// Switch Statment
/*
var firstName = 'Bruno';
var role = prompt('Enter the role');

switch (role){
    case 'frontend':
        alert(firstName + ' is frontend trainee');
        break;
    case 'backend':
        alert(firstName + ' is backend trainee');
        break;
    case 'software engineer' :
        alert(firstName + ' is software engineer');
        break;
    case 'hardware engieer' :
        alert(firstName + ' is hardware engineer');
}
*/

/* Truthy and falsy value */
//falsy value : undefined, null, 0, '', NaN
//truthy value : not falsy
/*
var age;
age = 0;

if(age || age === 0){
    alert('is defined');
} else {
    alert('not deifned');
}

//Equalit Operators

if(age == '12') {
    console.log('Type coercion');
}

*/

/* Functions */
/*
function calculateAge(birthyear){
    return 2021 - birthyear;
}

var ageJohn = calculateAge(1999);
alert(ageJohn);

function retirementYear(year,firstName) {
    var age = calculateAge(year);
    var retirement = 67 - age;
    alert(firstName + ' retires in ' + retirement + ' years.');
}
retirementYear(1999,'Jhon');
*/

/* fucntion statements and expressions */
//Function expression
/*
var operation = function(operation){
    switch(operation) {
        case 'addition':
            return 'A + B';
        case 'Substitution':
            return 'A - B';            
        case 'multiplication':
            return 'A * B';
        default:
            return 'other';
    }
}

alert(operation('Substitution'));
*/

/* Arrays */

var arr = ['one','two','three'];
var age = new Array(23,24,21);

alert(arr[0]);

arr[1] = 'four';
console.log(arr);
console.log(arr.length);

//push method
arr.push('five');
console.log(arr);

arr.pop();
arr.shift();
console.log(arr);

alert(arr.indexOf('four'));
