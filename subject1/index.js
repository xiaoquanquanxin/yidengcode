//  柯里化对于jq判断参数的类型
let arr = ['number', 'string', 'boolean'];

function getType(type) {
	return function (param) {
		return Object.prototype.toString.call(param).toLowerCase() === '[object ' + type + ']';
	}
}

let data = {};
for (let i = 0; i < arr.length; i++) {
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

let push = Array.prototype.push.uncurry();
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

let a = fun(0);
a.cccccc(1);
a.cccccc(2);
let b = fun(0).cccccc(1).cccccc(2).cccccc(3);
let c = fun(0).cccccc(1);
c.cccccc(2);
c.cccccc(3);


function sum(n, s) {
	console.trace();
	if (!n) {
		return s;
	}
	return sum(n - 1, n + s)
}

sum(11, 0)


//  函数式编程，函子
let Container = function (x) {
	this.val = x;
};
Container.prototype.map = function (f) {
	return Container.of(f(this.val));
};
Container.of = x => new Container(x);


//  maybe函子
Functor = function (val) {
	this.val = val;
};
Functor.of = function (val) {
	return new Functor(val);
};
Functor.prototype.map = f => {
	return Functor.of(f(this.val));
};

class Maybe extends Functor {
	static of(x) {
		return new Maybe(x);
	}

	map(f) {
		return this.val ? Maybe.of(f(this.val)) : Maybe.of(null);
	}
}

let m = Maybe.of('JAMESjawo;fja').map(function (s) {
	return s.toUpperCase();
});
console.log(m);


//  IO函子
function IO(f) {
	this.val = f;
}

IO.prototype.map = function (f) {
	return new IO(compose(f, this.val))
};

