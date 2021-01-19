function calculateBMI(mass,height) {
    return mass / (height / 100 * height / 100);
}

var Mark = calculateBMI(46,148);
console.log(`This is Mark's BMI: ${Mark}`);

var John = calculateBMI(56,172);
console.log(`This is John's BMI: ${John}`);

var c = Mark > John;
console.log(`Is Mark's BMI higher than John's? ${c}`);