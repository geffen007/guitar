$( document ).ready(function() {
  const nChords = 6; 
  var allNote = 
  [
		{ corda:"E1",  note: ['E1 ', 'F1 ', 'F1# ', 'G1 ', 'G1# ', 'A2 ', 'A2# ', 'B2 ', 'C2 ', 'C2# ', 'D2 ', 'D2# ']},
		{ corda:"A2",  note: ['A2 ', 'A2# ', 'B2 ', 'C2 ', 'C2# ', 'D2 ', 'D2# ', 'E2 ', 'F2 ', 'F2# ', 'G2 ', 'G2# ']},
		{ corda:"D2",  note: ['D2 ', 'D2# ', 'E2 ', 'F2 ', 'F2# ', 'G2 ', 'G2# ', 'A3 ', 'A3# ', 'B3 ', 'C3 ', 'C3# ']},
		{ corda:"G2",  note: ['G2 ', 'G2# ', 'A3 ', 'A3# ', 'B3 ', 'C3 ', 'C3# ', 'D3 ', 'D3# ', 'E3 ', 'F3 ', 'F3# ']},
		{ corda:"B3",  note: ['B3 ', 'C3 ', 'C3# ', 'D3 ', 'D3# ', 'E3 ', 'F3 ', 'F3# ', 'G3 ', 'G3# ', 'A4 ', 'A4# ']},
		{ corda:"E3",  note: ['E3 ', 'F3 ', 'F3# ', 'G3 ', 'G3# ', 'A4 ', 'A4# ', 'B4 ', 'C4 ', 'C4# ', 'D4 ', 'D4# ']}

	];

  var metronome;

  getChords(nChords);
  setChords(nChords, allNote);
  playChords();

  $("#saveCom").click(function(){

        saveTab();

  });


  $("#rec").on("click", function(){
    if($(this).hasClass("REGISTRA")){
      var point = ". ";
      metronome = setInterval(function(){
        $('#tab').append(point);
      }, 100);
      $(this).toggleClass("STOP REGISTRA");
      $(this).text("STOP")
    } else if ($(this).hasClass("STOP")){
      $(this).toggleClass("STOP REGISTRA");
      $(this).text("REGISTRA")
      clearInterval(metronome);
    }
  });

  $("#refresh").on("click", function(){
    $("#tab").empty();
  });

});


//costruisco l'html della chitarra
function getChords(qt){
  for (let i = 0; i < qt; i++) {
    let string = $(".string").html();
    $(".guitar").append(string);
  }
} 

//assegno le note
function setChords(qt, allNote){
  fret = $("#fret").html()
  for (let i = 0; i < qt; i++) {
    $(".chord").eq(i).addClass(allNote[i]["corda"]).attr("note", allNote[i]["corda"]);
    for (let y = 0; y < 12; y++) {
      $(".chord").eq(i).append(fret);
      $(".chord").eq(i).children(".fret").eq(y).attr("note", allNote[i]["note"][y]);
    }
  }
}


//al click sulla corda scrive la relativa nota
function playChords(){
  $('.fret').click(function() {
    thisChord = $(this).attr("note");
    $("#tab").append(thisChord);
  });
}


// invio la tab
function sendTab(tab, name){
  var params_data = new FormData();
  params_data.append('request', "saveNote");
  params_data.append('tablature', tab);
  params_data.append('nome', name)
  $.ajax({
    'url': '/guitar/php/save.php',
    'cache': false,
    'contentType': false,
    'processData': false,
    'method': 'post',
    'data':  params_data,
    'success': function() {
      rediSave();
    },
    'error': function() {
      console.log('errore');
    }
  });
};

// redirect alla pagina mie composizioni
function rediSave(){
  location.replace("/guitar/views/mycompositions.php");
};


function saveTab(){
  var tab = $("#tab").val();
  var name = $("#nameC").val();
  if(tab != ""){
    if(name != ""){
      sendTab(tab, name); 
    }else{
      alert('inserisci un nome');
    }
  } else {
    alert ('devi suonare qualcosa');
  }
}
