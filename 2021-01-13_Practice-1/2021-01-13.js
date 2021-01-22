var John = tipcalc([124,48,268]);

function tipcalc(array) {
    var tip = [];
    var fnt = [];
    var n,p,q,a,b,c;
    for (var i = 0; i < array.length; i++) {
        if (array[i] < 50) {
            n = 0.2 * array[i];
            tip.push(n);
        } else if (array[i] > 50 && array[i] < 200) {
             p = 0.15 * array[i];
             tip.push(p);
        } else {
            q = 0.1 * array[i];
            tip.push(q);
        }
    }

    a = array[0] + tip[0];
    fnt.push(a);
    b = array[1] + tip[1];
    fnt.push(b);
    c = array[2] + tip[2];
    fnt.push(c);
    
    console.log(`The tips given as: ${tip}`);
    console.log(`The final amounts are: ${fnt}`);
}



 