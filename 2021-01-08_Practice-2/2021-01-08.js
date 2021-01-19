var John = arrAvg([5,6,8]);
var Mike = arrAvg([5,5,10]);

function arrAvg(arr) {
    return arr.reduce((a, b) => a + b, 0) / arr.length;
}

console.log(`This is an average of John's score ${John}`);
console.log(`This is an average of Mike's score ${Mike}`);

if (John > Mike) {
    console.log(`John is the winner!`);
} else if(John === Mike) {
    console.log(`The Match is draw!!`);
} else {
    console.log(`Mike is the winner!`);
}