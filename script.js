var albums = [
    {
        name : 'Old Years',
        image : 'images/albumkapaklari/OLDYEARS.png',
        link : 'song.html',
        songs : ["Merhaba", "Thug Life", "Sokaklar", "Rüya" ]
    },
    {
        name : 'Antipatik',
        image : 'images/albumkapaklari/Antipatik.jpg',
        link : 'song.html'
    },
    {
        name : 'Eylem',
        image : 'images/albumkapaklari/EYLEM.jpg',
        link : 'song.html'
    },
    {
        name : 'Kelebeklerin Ölüm Saati',
        image : 'images/albumkapaklari/kös.png',
        link : 'song.html'
    },
    {
        name : 'Tenha E.P',
        image : 'images/albumkapaklari/TENHA.png',
        link : 'song.html'
    },
    {
        name : 'Örümcek Kafa E.P',
        image : 'images/albumkapaklari/örümcekkafa.png',
        link : 'song.html'
    }

];

var index = 0;
var slaytCount = albums.length;

showSlide(index);

document.querySelector('.fa-arrow-circle-left').addEventListener('click',function(){
    index--;
    showSlide(index);
    console.log(index);
});

document.querySelector('.fa-arrow-circle-right').addEventListener('click',function(){
    index++;
    showSlide(index);
    console.log(index);    
});

function showSlide(i){

    index = i;

    if (i<0) {
        index = slaytCount - 1;
    }
    if(i >= slaytCount){
        index =0;
    }

    document.querySelector('.albumad').textContent = albums[index].name;

    document.querySelector('.albumfoto').setAttribute('src',albums[index].image);
    
    document.querySelector('.card-link').setAttribute('href',albums[index].link);

}



