
async function postData() {
    
    const options = {
        method: 'POST',
        headers: {
        'Content-Type': 'application/json'
        }
        // aqui añadimos el body con informacion de formulario que se enviara al post de php
    }

    try {
        const response = await fetch('curlpost.php', options)
        const data = await response.json()
        renderData(data)
    } catch (error) {
        console.log(error)
    }
    
}

const renderData = data => {
    const dataResult = document.getElementById('data-result')
    const { 
        authcode, 
        orderid,
        response, 
        responsecode, 
        transactionid, 
        type
    } = data;

    let result =`
        <h2>Resultado del request</h2>
        <p>authcode: <span>${authcode}</span></p>
        <p>orderid: <span>${orderid}</span></p>
        <p>response: <span>${response}</span></p>
        <p>responsecode: <span>${responsecode}</span></p>
        <p>transactionid: <span>${transactionid}</span></p>
        <p>type: <span>${type}</span></p>
    `;

    dataResult.innerHTML = result
}
