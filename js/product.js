function createProduct() {
    // build object
    let formData = {
      productName: document.querySelector('#input-productName').value,
    };
  
    console.log(formData);
  
    fetch('http://localhost/?action=create', {
      method: 'POST',
      body: JSON.stringify(formData),
    })
      .then((response) => response.json())
      .then((data) => {
        console.log('Success:', data);
      })
      .catch((error) => {
        console.error('Error:', error);
      });
  }