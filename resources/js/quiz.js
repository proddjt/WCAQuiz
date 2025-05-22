let divList = {}
let error_text = document.querySelector("#error");
let success_text = document.querySelector("#success");
function loadValues(){
    person.rank.averages.forEach(average => {
        divList[`${average.eventId}_average`] = document.querySelector(`#div_${average.eventId}_average`);
        divList[`${average.eventId}_nr_average`] = document.querySelector(`#div_${average.eventId}_nr_rank_average`);
        divList[`${average.eventId}_cr_average`] = document.querySelector(`#div_${average.eventId}_cr_rank_average`);
        divList[`${average.eventId}_wr_average`] = document.querySelector(`#div_${average.eventId}_wr_rank_average`);
    })
    person.rank.singles.forEach(single => {
        divList[`${single.eventId}_single`] = document.querySelector(`#div_${single.eventId}_single`);
        divList[`${single.eventId}_nr_single`] = document.querySelector(`#div_${single.eventId}_nr_rank_single`);
        divList[`${single.eventId}_cr_single`] = document.querySelector(`#div_${single.eventId}_cr_rank_single`);
        divList[`${single.eventId}_wr_single`] = document.querySelector(`#div_${single.eventId}_wr_rank_single`);
    })

    let nationality = document.querySelector("#nationality");
    let wca_id = document.querySelector("#wca_id");
    let competitions_number = document.querySelector("#competitions_number");
    let championships_number = document.querySelector("#championships_number");
    let golds = document.querySelector("#golds");
    let silvers = document.querySelector("#silvers");
    let bronzes = document.querySelector("#bronzes");
    let wr = document.querySelector("#wr");
    let cr = document.querySelector("#cr");
    let nr = document.querySelector("#nr");
    let person_name = document.querySelector("#person_name");
    
}

function showNationality(){
    setTimeout(() => {
        let fullNationality = ""
        countryList.forEach(country => {
            if(country.iso2Code === person.country){
                fullNationality = country.name
            }
        })
        nationality.innerHTML = `<span class="fi fi-${person.country.toLowerCase()}"></span> ${fullNationality}`
    },100)

}

function showCompNumber(){
    setTimeout(() => {
        competitions_number.innerHTML = person.numberOfCompetitions
    },100)
}

function showChampNumber(){
    setTimeout(() => {    
        championships_number.innerHTML = person.numberOfChampionships
    },100)
}

function showMedals(){
    setTimeout(() => {
        golds.innerHTML = person.medals.gold
        silvers.innerHTML = person.medals.silver
        bronzes.innerHTML = person.medals.bronze
    },100)
}

function showRecords(){
    setTimeout(() => {
        wr.innerHTML = (person.records.single.WR || 0) + (person.records.average.WR || 0)
        cr.innerHTML = (person.records.single.CR || 0) + (person.records.average.CR || 0)
        nr.innerHTML = (person.records.single.NR || 0) + (person.records.average.NR || 0)
    },100)
}

function showYear(){
    setTimeout(() => {
        wca_id.innerHTML = person.id.slice(0, 4)
    },100)
}

function showAverages(){
    setTimeout(() => {
        person.rank.averages.forEach(average => {
            if (average.eventId == "333fm"){
                divList[`${average.eventId}_average`].innerHTML = formatNumber(average.best);
            }else{
                divList[`${average.eventId}_average`].innerHTML = formatCentiseconds(average.best);
            }
            divList[`${average.eventId}_nr_average`].innerHTML = average.rank.country;
            divList[`${average.eventId}_cr_average`].innerHTML = average.rank.continent;
            divList[`${average.eventId}_wr_average`].innerHTML = average.rank.world;
        })
    },100)
}

function showSingles(){
    setTimeout(() => {
        person.rank.singles.forEach(single => {
            if (single.eventId == "333fm"){
                divList[`${single.eventId}_single`].innerHTML = single.best;
            }else{
                divList[`${single.eventId}_single`].innerHTML = formatCentiseconds(single.best);
            }
            divList[`${single.eventId}_nr_single`].innerHTML = single.rank.country;
            divList[`${single.eventId}_cr_single`].innerHTML = single.rank.continent;
            divList[`${single.eventId}_wr_single`].innerHTML = single.rank.world;
        })
    },100)
}

function showNameAndId(){
    setTimeout(() => {
        wca_id.innerHTML = person.id
        person_name.innerHTML = person.name
    },100)
}

function showAll(){
    showNationality();
    showCompNumber();
    showChampNumber();
    showMedals();
    showRecords();
    showAverages();
    showSingles();
    showNameAndId();
}

function formatCentiseconds(centiseconds) {
    let minutes = Math.floor(centiseconds / 6000);
    let seconds = Math.floor((centiseconds % 6000) / 100);
    let hundredths = centiseconds % 100;

    if (minutes > 0) {
        return `${minutes}:${seconds.toString().padStart(2, '0')}.${hundredths.toString().padStart(2, '0')}`;
    } else {
        return `${seconds}.${hundredths.toString().padStart(2, '0')}`;
    }
}

function formatNumber(num) {
    num = num.toString();

    if (num.length === 4) {
        return `${num.slice(0, -2)}.${num.slice(-2)}`;
    } else if (num.length === 2) {
        return `${num}.00`;
    } else {
        return num;
    }
}

Livewire.on('wrongAnswer', (count) => {
    switch (count.count) {
        case 1:
            showNationality();
            break;
        case 2:
            showNationality();
            showCompNumber();
            break;
        case 3:
            showNationality();
            showCompNumber();
            showChampNumber();
            break;
        case 4:
            showNationality();
            showCompNumber();
            showChampNumber();
            showMedals();
            break;
        case 5:
            showNationality();
            showCompNumber();
            showChampNumber();
            showMedals();
            showRecords();
            break;
        case 6:
            showNationality();
            showCompNumber();
            showChampNumber();
            showMedals();
            showRecords();
            showYear();
            break;
        case 7:
            showNationality();
            showCompNumber();
            showChampNumber();
            showMedals();
            showRecords();
            showYear();
            showAverages();
            break;
        case 8:
            showNationality();
            showCompNumber();
            showChampNumber();
            showMedals();
            showRecords();
            showYear();
            showAverages();
            showSingles();
            break;
    }
    setTimeout(() => {
        error_text.innerText = "Wrong Answer";  
    },100)
})

Livewire.on('correctAnswer', () => {
    showAll();
    setTimeout(() => {
        success_text.innerText = "Correct Answer";
    },100)
    
})

Livewire.on('gameOver', () => {
    showAll();
    console.log("Game Over");
    
})

loadValues();
