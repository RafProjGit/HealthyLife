document.querySelector( "form" ).addEventListener( "invalid", function( event ) {
				event.preventDefault();
				var lista = document.getElementById("lista");
				var li = document.createElement("li")
				var text = "Valore non corretto per il campo " + event.target.id +". " + event.target.title;
				li.appendChild(document.createTextNode(text));
				lista.appendChild(li);
				document.getElementById("result").style.display = "block";
			}, true );

		document.querySelector( 'input[type="submit"]' ).addEventListener("click", function( event ) {
			var lista = document.getElementById("lista");
			lista.innerHTML='';
		}, true);
