// Function returning function
/*
function interviewQue(job) {
    if (job === 'designer') {
        return function(name) {
            console.log(name + ', can you explain what UX design is?');
        }
    } else if (job === 'teacher') {
        return function(name) {
            console.log('what subject do you teach, ' + name + '?');
        }
    } else {
        return function(name) {
            console.log('hello ' + name + ', what do you do?');
        }
    }
}

//1st method to call function

var teacherQue = interviewQue('teacher');
var designerQue = interviewQue('designer');

teacherQue('john');
designerQue('mark');

//2nd method

interviewQue('teacher')('venus');

//
//IIFE

function game() { 
    var score = Math.random() * 10;
    console.log(score >= 5);
}
game();


//Function declaretion changed into expression
(function (goodLuck) {
    var score = Math.random() * 10;
    console.log(score >= 5 - goodLuck);
})(5);

//
//Closures

function interviewQue(job) {
    return function(name) {
        if (job === 'designer') {
            console.log(name + ', can you explain what UX design is?');
        } else if (job === 'teacher') {
            console.log('what subject do you teach, ' + name + '?');
        } else {
            console.log('hello ' + name + ', what do you do?');
        }
    }
}
interviewQue('teacher')('venus');
*/
//
//BIND, CAll ,APPLY methods
/*
var john = {
    name: 'john',
    age: 23,
    job: 'teacher',
    presentation: function(style,timeOfDay) {
        if (style === 'formal') {
            console.log('good' + timeOfDay + ', I\'m ' + this.name + ', I\'m a ' + this.job + ' and  I\'m ' + this.age + ' years old!');
        } else if (style === 'friendly') {
            console.log('Hey !! what\'s up? I\'m ' + this.name + ', I\'m a ' + this.job + ' and  I\'m ' + this.age + ' years old! Have a nice ' + timeOfDay + '.');
        }
    }
}

var mark = {
    name: 'mark',
    age: 56,
    job: 'designer'
};

john.presentation('formal','morning');
//Call method
john.presentation.call(mark,'friendly','night');
//Apply method
john.presentation.apply(mark,['friendly','afternoon']);
//Bind method
var johnfriendly = john.presentation.bind(john,'friendly');
johnfriendly('morning');
johnfriendly('night');

var markformal = john.presentation.bind(mark,'formal');
markformal('evening');

////////////////////
// ES6

//Variable declarations with LET and CONST

const name = 'John';
let age = 6;
name = 'jane';
console.log(name);


//variable scope
function licence(passedTest) {
    let firstName;
    const yearOfBirth = 1999;

    if(passedTest) {
        firstName = 'john';
    }
    
    console.log(firstName + ', born in ' + yearOfBirth + ' is now have a licence.');
}
licence(true);

//Blocks And IIFES
{
    const a = 1;
    let b = 2;
}
console.log(a + b); ///error
*/

//Strings in ES6

let firstName = 'john';
let lastName = 'smith';
const yearOfBirth = 1999;

function calculateAge(year) {
    return 2021 - year;
}

console.log(`This is ${firstName} ${lastName}. He was born in ${yearOfBirth}. Today he is ${calculateAge(yearOfBirth)} years old.`);

const n = `${firstName} ${lastName}`;
console.log(n.startsWith('j'));
console.log(n.endsWith('Sm'));
console.log(n.includes('oh'));
console.log(`${firstName} `.repeat(5));