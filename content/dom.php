<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="utf-8">	
		<title><?php echo $titlePage ?></title>
		<link rel="stylesheet" href="/css/style.css">
		<link href = "https://fonts.googleapis.com/css?family= Gugi " rel = "stylesheet">
		<script src="/jQuery/jQuery.js"></script>
		<script src="https://api-maps.yandex.ru/2.1/?apikey=04667861-63a6-4e63-bb5b-ad5defc1cb28&lang=ru_RU" type="text/javascript"></script>
		<script src="https://npmcdn.com/react@15.3.0/dist/react.js"></script>
		<script src="https://npmcdn.com/react-dom@15.3.0/dist/react-dom.js"></script>
		<script src="https://npmcdn.com/babel-core@5.8.38/browser.min.js"></script>
		<script src="https://npmcdn.com/jquery@3.1.0/dist/jquery.min.js"></script>
		<script src="https://npmcdn.com/remarkable@1.6.2/dist/remarkable.min.js"></script>
	</head>
	<body>	
<div id="content"></div>

<script type="text/babel">
class App extends React.Component
{
	constructor()
	{
		super();
		this.state = {arr:  ['a', 'b', 'c', 'd', 'e']};
		//this.getText = this.getText.bind(this);
	}
	
	changeState()
	{
		this.setState({message: 'qqqqqqq'});
	}
	
	getNum1()
	{
		return 1;
	}
	
	getNum2()
	{
		return 2;
	}
	
	
	render()
	{
		return <div>
			{this.getNum1() + this.getNum2()}
		</div>
	}
}

ReactDOM.render(
<App/>,
document.getElementById('content')
);
</script>

</body>
</html>