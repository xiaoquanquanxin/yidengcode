//  柯里化对于jq判断参数的类型
var arr = ['number', 'string', 'boolean'];

function getType(type) {
	return function (param) {
		return Object.prototype.toString.call(param).toLowerCase() === '[object ' + type + ']';
	}
}

var data = {};
for (var i = 0; i < arr.length; i++) {
	data['is' + arr[i]] = getType(arr[i]);
}
// console.log(data['isnumber']());
// console.log(data['isstring']('ww'));


//  尾递归
function fib(c, p, n) {
	p = p || 0;
	n = n || 1;
	// console.log(c, p, t);
	if (c <= 1) {
		return p + n;
	}
	return fib(--c, n, p + n);
}

console.log(fib(8));
// 1 1 2
// 1 2 3
// 2 3 5
// 3 5 8
//  首先，c不进行任何运算
//  p是前一个，t是后一个，最开始就是0,1，如果是0,0，直接加不出任何数了
//  在递归的过程中，传入下一个数要错位


//  反柯里化
Function.prototype.uncurry = function () {
	console.log(this);
	return this.call.bind(this);
};

var push = Array.prototype.push.uncurry();
push(arr, 3);
console.log(arr);

// this.call
// fn.call
// newFn(fn,arg)
// newFn.bind(fn);
// fn.newFn;
// fn.newFn(fn,arg);
// push


//  作用域
function fun(n, o) {
	console.log(o);
	return {
		cccccc: function (m) {
			return fun(m, n);
		}
	}
}

var a = fun(0);
a.cccccc(1);
a.cccccc(2);
var b = fun(0).cccccc(1).cccccc(2).cccccc(3);
var c = fun(0).cccccc(1);
c.cccccc(2);
c.cccccc(3);






















