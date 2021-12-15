let animals = [];
let vegetables = [];

// Fonction pour calculer le totale
const calcTotal = () => {
	let sumVgtCulitive = 0;
	let sumVgtTotal = 0;
	let sumAnmTotal = 0;
	$.each(vegetables, (index, vegetable) => {
		sumVgtCulitive += parseInt(vegetable.cultive);
		sumVgtTotal += parseInt(vegetable.total);
	});
	$.each(animals, (index, animal) => {
		sumAnmTotal += parseInt(animal.number);
	});
	$("#total-vgt td:nth-child(2)").html(sumVgtCulitive);
	$("#total-vgt td:nth-child(3)").html(sumVgtTotal);
	$("#total-anm td").html(sumAnmTotal);
};

// Form change event
$("form select").change((e) => {
	if (e.target.value === "vegetables") {
		$(".vgt").addClass("show");
		$(".anm").removeClass("show");
	} else {
		$(".vgt").removeClass("show");
		$(".anm").addClass("show");
	}
});
//calcTotal();


// fonction pour créer le tableau
const createTable = () => {
	$("#table-anm tbody").empty(); /**removes all descendant nodes from selected DOM elements. All strings of text are also considered child elements and thus removed.  */
	$("#table-vgt tbody").empty();

	$.each(animals, (index, animal) => {
		$("#table-anm tbody").append(
			`<tr>
							<th>${animal.name}</th>
							<td>${animal.number}</td>
						</tr>`
		);
	});
	$.each(vegetables, (index, vegetable) => {
		$("#table-vgt tbody").append(
			`<tr>
							<th>${vegetable.name}</th>
							<td>${vegetable.cultive}</td>
							<td>${vegetable.total}</td>
						</tr>`
		);
	});
	calcTotal();
};

// fonction qui get les produits de fichier .json
const getProducts = () => {
	$.ajax({
		method: "GET",
		//url: new XMLHttpRequest("produit.json"),
    url :  "http://localhost:5500/produit.json",
    
		dataType: "json",
		//async: false,
     //   success: success,
        
	}).done(function (data) {
		vegetables = data.vegetables;
		animals = data.animals;
		createTable();
	});
};

getProducts();

// fonction qui envoie les données pour sauvgarder dans le fichier json

/*const addToProducts = () => {
	
	$.ajax({
		method: "POST",
		url: "produit.json",
		headers: {
			"Content-Type": "application/json; utf-8",
		},
		data: {
			name: "Pomme de terre",
			cultive: "220417",
			total: "220417",
		},
		/*success: (data, status, xhr) => {
			console.log(data);
		},*/
/* 	}) ;
};*/

// Fonction ajouter un item
const addItem = (e) => {
	e.preventDefault();
	if ($("#selectTable").val() === "vegetables") {
		const name = $("#culture").val();
		const superficie = $("#superficie").val();
		const total = $("#total").val();
		if (!name || !superficie || !total) return;
		vegetables.push({
			name: name,
			cultive: superficie,
			total: total,
		});
		$("#table-vgt tbody").append(`
						<tr>
							<th>${name}</th>
							<td>${superficie}</td>
							<td>${total}</td>	
						</tr>
					`);
	} else {
		const espece = $("#espece").val();
		const number = $("#number").val();
		if (!espece || !number) return;
		animals.push({
			name: espece,
			number: number,
		});
		$("#table-anm tbody").append(`
						<tr>
							<th>${espece}</th>
							<td>${number}</td>
						</tr>
					`);
	}
	calcTotal();
};
$("#buttonajouter").click(addItem) ;
//$("form").submit(addItem);

// Do request chaque 3 secondes
setInterval(function () {
	getProducts();
}, 3000);