var John = {
    fullName: "John Dyane",
    mass: 56,
    height: 173,
    JohnBMI: function () {
        return this.mass / (this.height / 100 * this.height / 100);
    }
};
var Mark = {
    fullName: "Mark Doe",
    mass: 76,
    height: 173,
    MarkBMI: function () {
        return this.mass / (this.height / 100 * this.height / 100);
    }
};
var jBMI = John.JohnBMI();
var mBMI = Mark.MarkBMI();

console.log(`John's BMI is: ${jBMI}`);
console.log(`Mark's BMI is: ${mBMI}`);

if (jBMI > mBMI) {
    console.log(`${John.fullName} has highest BMI that is ${jBMI}!`);
} else if(jBMI === mBMI) {
    console.log(`${John.fullName} & ${Mark.fullName} both have equal BMI that is: ${jBMI}!!`);
} else {
    console.log(`${Mark.fullName} has highest BMI that is ${mBMI}`);
}
