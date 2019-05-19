<h1>React основы</h1>
<h2>Первый запуск</h2>
<pre>
Перед тем как освоить React изучите уроки по работе с контекстом и учебник по ООП на классах в стиле ES6 в JavaScript.
React работает на ES6, поддержки которого пока во всех браузерах нет. Поэтому для того, чтобы ваш код заработал, - следует использовать специальные 
программы-транспойлеры, которые преобразуют ваш код ES6 в код ES5.
Для самого простого запуска React нужно подключить такую кучку скриптов:
<script src="https://npmcdn.com/react@15.3.0/dist/react.js"></script>
<script src="https://npmcdn.com/react-dom@15.3.0/dist/react-dom.js"></script>
<script src="https://npmcdn.com/babel-core@5.8.38/browser.min.js"></script>
<script src="https://npmcdn.com/jquery@3.1.0/dist/jquery.min.js"></script>
<script src="https://npmcdn.com/remarkable@1.6.2/dist/remarkable.min.js"></script>
На продакшене (так называют рабочий сайт) так делать не стоит (так как здесь компиляция кода из новой версии в старую происходит в браузере, а это очень медленно).
После подключения этих скриптов мы можем выполнять наш ES6 код в теге script с типом text/babel (это важно: не text/javascript, как мы привыкли):
&lt;script type="text/babel"&gt;
	тут код
&lt;/script&gt;
Итак создаем блок, например &lt;div&gt;&lt;/div&gt;
Создаем класс компонент:
Чтобы быть компонентом, этот класс обязательно должен наследовать от класса React.Component
&lt;script type="text/babel"&gt;
//существует самый главный компонент верхнего уровня - в нем лежат все остальные компоненты.
//Обычно этот компонент называют App (но не обязательно):
class App extends React.Component //компонентом может быть header, footer..., или вложенные в них меню, логотипы и т.д.
{
	constructor()
	{
		this.state = {message: 'hello', test: '!!!'}; // в state я храню переменные, которые потом можно вставлять в теги
		super();
		this.out = this.out.bind(this); // это называется "прибандить", дабы не прописывать функцию bind для каждого события.
	}
	
	changeState()
	{
		this.setState({message: 'qqqqqqq'}); // Здесь мы меняем наш state.message, функция setState принадлежит родительскому классу
	}
	
	//Я создам метод, который будет вызываться через обработчик событий
	out()
	{
		alert('!!!');
	}
	В React встроен специальный язык под названием JSX. Суть этого языка такая: HTML теги являются корректным JavaScript кодом и мы можем просто писать 
	их прямо в скрипте, не беря в кавычки.
	//Если мы собираемся использовать сонструктор для нашего класса, незабудем использовать ключевое слово super(); так как наследуем от другого класса
	
	render() // Компонент хранит функцию, которая возвращает блок div.
	{
		var text = &lt;p&gt;&lt;/p&gt;; // данный код также можно записывать в переменную и вставлять ее в return с помощью {}
		return &lt;div&gt; //когда вставляем обработчик, кавычки не пишу, а использую {}, без () будет вставляться исходный код out.
		&lt;p onClick={this.out.bind(this)}&gt;hello&lt;/p&gt;// Чтобы this контекста не потерялся использую функцию bind(this), в которой передаю контекст this.
		&lt;p&gt;{this.state.message}&lt;/p&gt; // а вот так мы вставляем наши значения из state.
		&lt;/div&gt;;	
	}
}
// Далее вызываем встроенный объект ReactDOM, которая будет запускать наш компонент:
ReactDOM.render(
&lt;App/&gt;, // первый параметр вставляется в виде тега с именем класса (компонента).
document.getElementById('content') // Второй параметр это элемент страницы, в данном случае наш блок div.
);

&lt;/script&gt;
При написании кода в React принято использовать const вместо var.
При определении константы обязательно должно быть указано ее значение.
Как уже упоминалось ранее, кусочки HTML кода можно записывать в переменные. Давайте сделаем это внутри метода render: запишем кусочек текста в 
переменную text, а затем напишем эту переменную после return:
class App extends React.Component {
	render() {
		const text = &lt;div>текст&lt;/div>;
		return text;
	}
}
Вставку переменных можно делать не только в тексты тегов, но и в атрибуты. При этом кавычки от атрибутов не ставятся:
class App extends React.Component {
	render() {
		const str = 'elem';
		const text = &lt;div id={str}>текст&lt;/div>;
		return text;
	}
}

Такое работает для всех атрибутов, но есть исключение. Вместо атрибута class следует писать атрибут className:
const text = &lt;div className={str}>текст&lt;/div>;
С помощью атрибутов можно также добавлять CSS стили элементам.
class App extends React.Component {
	render() {
		const css = {color: 'red', fontSize: '30px'};
		const text = &lt;div style={css}>текст&lt;/div>;
		return text;
	}
}

Можно объект написать прямо в атрибуте - в этом случае нам нужны две фигурные скобки: первая от JSX вставки, а вторая - от объекта:
class App extends React.Component {
	render() {
		const text = &lt;div style={ {color: 'red', fontSize: '30px'} }>
			текст
		&lt;/div>;
		return text;
	}
}

При работе с кусочками HTML можно применять условия if. Давайте сделаем так, чтобы в зависимости от содержимого переменной showText на экран 
вывелся один или другой текст:

class App extends React.Component {
	render() {
		const text;
		const showText = true;
		
		if (showText) {
			text = &lt;div>текст1&lt;/div>;
		} else {
			text = &lt;div>текст2&lt;/div>;
		}

		return text;
	}
}

Кусочки HTML кода можно делать в цикле. Обычно для этого используется цикл map. Пример: пусть у нас есть массив arr, давайте каждый элемент этого 
массива обернем в тег li и сохраним этот набор li-шек в переменную list:
const arr = [1, 2, 3, 4, 5];

const list = arr.map(function(item, index) {
	return &lt;li>{item}&lt;/li>;
});
В list запишется текст &lt;li>1&lt;/li>&lt;li>2&lt;/li>&lt;li>3&lt;/li>&lt;li>4&lt;/li>&lt;li>5&lt;/li> - и это будет работать ни смотря на то, что эти лишки не обернуты в общий тег. 
То есть в цикле такое можно делать, а напрямую так сразу написать в переменную - нет.

В предыдущем примере мы формировали наши лишки в цикле, вот так:
const list = arr.map(function(item, index) {
	return &lt;li>{item}&lt;/li>;
});
Это будет работать, однако, если заглянуть в консоль - мы увидим ошибку: Warning: Each child in an array or iterator should have a unique "key" prop. В данном случае React требует, чтобы каждой лишке мы дали уникальный номер, чтобы реакту было проще с этими лишками работать в дальнейшем.

Этот номер добавляется с помощью атрибута key. Чаще всего (но не обязательно) в качестве номера используется номер элемента в массиве. 
В нашем случае этот номер хранится в переменной index и значит исправленная строка будет выглядеть вот так: &lt;li key={index}>{item}&lt;/li>.
Еще раз: этот атрибут key имеет служебное значение для реакта, более глубоко вы поймете этот момент в следующих уроках. Пока просто знайте: если вы видите такую ошибку - добавьте атрибут key с уникальным для каждого тега значением и проблема исчезнет.

Ключ key должен быть уникальным только внутри этого цикла, в другом цикле значения key могут совпадать со значениями из другого цикла.

</pre>