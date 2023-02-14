function doSomething(state) {
    return new Promise(function myGeheimnis(resolve, reject) {
        setTimeout(function timeoutDone() {
            if (state === 1) {
                resolve('Das hat funktioniert :)');
            } else {
                reject('Das hat LEIDER NICHT funktioniert!');
            }
        }, 3000);
    });
}

console.log('1. Before DoSomething()...');

doSomething(1)
.then(function resolveFunc(data) {
    console.log(data);
    data = data + ' + Änderungen aus resolveFunc()';
    return data;
})
.then(function resolveFunc2(data) {
    console.log(data);
})
.catch(function rejectFunc(err) {
    console.log(err);
})

console.log('3. After DoSomething()...');