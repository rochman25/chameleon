//console.log("ready");
/*
plugin made by trian
*/
class CustomLogging {
	constructor() {
		// warna default
		this.body = {
			color: "#008f68",
			size: "1rem"
		};
	}

	setBodyStyle({ color, size }) {
		// kalo ada warna baru
		if (color !== undefined) this.body.color = color;
		if (size !== undefined) this.body.size = size;
	}

	log(body = "") {
		// template
		console.log(
			`%c${body}`,
			`color: ${this.body.color}; font-weight: bold; font-size: ${this.body.size}; text-shadow: 0 0 5px rgba(0,0,0,0.2);`
		);
	}
}
