$( document ).ready(function() {
  var notes = [
    { src:"E1.mp3",   id:"E1 "  },
    { src:"F1.mp3",   id:"F1 "  },
    { src:"F1d.mp3",  id:"F1# " },
    { src:"G1.mp3",   id:"G1 "  },
    { src:"G1d.mp3",  id:"G1# " },
		{ src:"A2.mp3",   id:"A2 "  },
    { src:"A2d.mp3",  id:"A2# " },
    { src:"B2.mp3",   id:"B2 "  },
    { src:"C2.mp3",   id:"C2 "  },
    { src:"C2d.mp3",  id:"C2# " },
    { src:"D2.mp3",   id:"D2 "  },
    { src:"D2d.mp3",  id:"D2# " },
    { src:"E2.mp3",   id:"E2 "  },
    { src:"F2.mp3",   id:"F2 "  },
    { src:"F2d.mp3",  id:"F2# " },
    { src:"G2.mp3",   id:"G2 "  },
    { src:"G2d.mp3",  id:"G2# " },
    { src:"A3.mp3",   id:"A3 "  },
    { src:"A3d.mp3",  id:"A3# " },
    { src:"B3.mp3",   id:"B3 "  },
    { src:"C3.mp3",   id:"C3 "  },
    { src:"C3d.mp3",  id:"C3# " },
    { src:"D3.mp3",   id:"D3 "  },
    { src:"D3d.mp3",  id:"D3# " },
    { src:"E3.mp3",   id:"E3 "  },
    { src:"F3.mp3",   id:"F3 "  },
    { src:"F3d.mp3",  id:"F3# " },
    { src:"G3.mp3",   id:"G3 "  },
    { src:"G3d.mp3",  id:"G3# " },
    // { src:"A4.mp3",   id:"A4"  },
    // { src:"A4d.mp3",  id:"A4#" },
    // { src:"B4.mp3",   id:"B4"  },
    // { src:"C4.mp3",   id:"C4"  },
    // { src:"C4d.mp3",  id:"C4#" },
    // { src:"D4.mp3",   id:"D4"  },
    // { src:"D4d.mp3",  id:"D4#" },
    // { src:"E4.mp3",   id:"E4"  },
    // { src:"F4.mp3",   id:"F4"  },
    // { src:"F4d.mp3",  id:"F4#" },
    // { src:"G4.mp3",   id:"G4"  },
    // { src:"G4d.mp3",  id:"G4#" },
	];



  createjs.Sound.registerManifest(notes, "/guitar/wav/");

  $(".play").on("click", function(){
    var attribute = "#"+ $(this).attr("compid");
    var comp = $(attribute).text();
    var arr = comp.split(" ");
    var count = 0;

    var play = setInterval(function(){
        if(arr[count] != "."){
          var nota = arr[count];
          createjs.Sound.play(nota+" ");
          console.log(nota);
        }
        count++;
        if(count == (arr.length - 1)){
          console.log("finito");
          clearInterval(play);
        }
    }, 100);
  });
  
  $(".fret").click(function(){
    var nota = $(this).attr("note");
    console.log(nota);
    createjs.Sound.play(nota);
  });


});






