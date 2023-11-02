const dropArea= document.querySelector(".drag-area"),
dragText = dropArea.querySelector("header"),
button = dropArea.querySelector("button"),
input = dropArea.querySelector("input");
let file;

button.onclick = ()=>{
    input.click();
}

input.addEventListener("change", function(){
    file = this.files[0];
    dropArea.classList.add("active");
    showFile();
});

dropArea.addEventListener("dragover", (Event)=>{
    Event.preventDefault();
    dropArea.classList.add("Active");
    dragText.textContent = "Release to Upload file";
});

dropArea.addEventListener("dragleave", ()=>{
    dropArea.classList.remove("active");
    dragText.textContent = "Drag & Drp to Upload File";
});

dropArea.addEventListener("drop", (event)=>{
    event.preventDefault(); 
    file = event.dataTransfer.files[0];
    showFile(); 
  });

  function showFile(){
    let fileType = file.type; 
    let validExtensions = ["image/jpeg", "image/jpg", "image/png"]; 
    if(validExtensions.includes(fileType)){ 
      let fileReader = new FileReader(); 
      fileReader.onload = ()=>{
        let fileURL = fileReader.result; 
        dropArea.innerHTML = imgTag; 
      }
      fileReader.readAsDataURL(file);
    }else{
      alert("This is not an Image File!");
      dropArea.classList.remove("active");
      dragText.textContent = "Drag & Drop to Upload File";
    }
  }

  