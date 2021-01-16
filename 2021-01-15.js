/*primitives -num,string,boolean,undefined,null
object- arrays,function,objects,dates,wrapper

inheritance- prototype property in js
*/

// Fuunction constructor

var student = {
    name: 'bruno',
    yearOfBirth: 1999,
    job: 'trainer'
};

var Person = function(name, yearOfBirth, job) {
    this.name = name;
    this.yearOfBirth = yearOfBirth;
    this.job = job;
    this.calculateAge = function() {
        alert(2020-this.yearOfBirth);
    }
}

Person.prototype.calculateAge = function() {
    alert(2020-this.yearOfBirth);
};

var mark = new Person('mark',1999,'trainer');
var jone = new Person('jone',1990,'trainer');
var jane = new Person('jane',1995,'trainer');
mark.calculateAge();
jone.calculateAge();
jane.calculateAge();

// Prototype Chain

// Primities & objects

var a = 23;
var b = a;
a = 46;
console.log(a);
console.log(b);

//objects
var obj1 = {
    name: 'john',
    age: 26
}

var obj2 = obj1;
obj1.age = 30;
console.log(obj1.age);
console.log(obj2.age);

// Functions
var age = 28;
var obj = {
    name: 'jonas',
    city: 'London'
};

function change(a,b) {
    a= 39;
    b.city = 'Newyork';
}
change(age,obj);

console.log(age);
console.log(obj.city);

//Passing function in arguments

var years = [1999,1999,1894,1933];

function arrayCalc(arr,fn) {
    var arrRes = [];
    for (var i = 0;i < arr.length;i++){
        arrRes.push(fn(arr[i]));
    }
    return arrRes;
}

function calculateAge(el) {
    return 2021 - el;
}

function isFullAge(el){
    return el >= 18;
}

function maxHeartRate(el) {
    if(el >= 18 && el <= 81) {
        return Math.round(286.9 - (0.67 * el));
    } else {
        return -1;
    }
}

var ages = arrayCalc(years,calculateAge);
var fullAges = arrayCalc(ages,isFullAge);
var rates = arrayCalc(ages,maxHeartRate);

console.log(ages);
console.log(fullAges);
console.log(rates);




