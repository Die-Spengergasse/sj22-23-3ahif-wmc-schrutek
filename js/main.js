function getDetails(guid) {
    fetch("/?action=userdetails&guid=" + guid)
    .then(function (response) {
        return response.json();
    })
    .then(function (data) {
        console.log(data);
        let detailsContainer = document.getElementById('detailsContainer');
        let containerContent =
        `
            <dl>
                <dt>GUID:</dt>
                <dd>${data.guid}</dd>
                <dt>User Name:</dt>
                <dd>${data.username}</dd>
            </dl>
        `
        detailsContainer.innerHTML = containerContent;
    })
}

function getPriceTrends(offerid) {
    fetch("/?action=trends&offerid=" + offerid)
    .then(function (response) {
        return response.json();
    })
    .then(function (data) {
        let trendsContainer = document.getElementById('trendsContainer');
        trendsContainer.innerHTML = '';
        for(let priceTrend of data) {
            const htmlData = 
            `
                <td>${priceTrend.id}</td>
                <td>${priceTrend.guid}</td>
                <td>${priceTrend.price}</td>
                <td>${priceTrend.date}</td>
            `
            const tr = document.createElement('tr');
            const td = document.createElement('td');
            tr.innerHTML = htmlData;
            trendsContainer.appendChild(tr);
        }
    })
}
