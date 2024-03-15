let previewImage = (uploadBtnID, choosenImageID) => {
	uploadBtn = document.getElementById(uploadBtnID);
	choosenImage = document.getElementById(choosenImageID);

	let fileReader = new FileReader();
	fileReader.readAsDataURL(uploadBtn.files[0]);

	fileReader.onload = () => {
		choosenImage.setAttribute("src", fileReader.result);
	};
};
