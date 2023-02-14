function doSomething(callbackFunc) {
    setTimeout(function timeoutDone() {
        callbackFunc(({ 'Point': '{ x: 5, y: 3}', Length: 12 }));
    }, 3000)
}

console.log('1. Before DoSomething()...');
doSomething(function callbackDone(data) { 
    console.log(`2. timeout ist fertig! + Point: ${data.point} + Length: ${data.Length}`); 
});
console.log('3. After DoSomething()...');