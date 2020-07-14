import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-picker',
  templateUrl: './picker.component.html',
  styleUrls: ['./picker.component.scss'],
})


export class PickerComponent implements OnInit {

  //data for tests
  musician1 = {
    pic: "../../../assets/testPic.jpg",
    instrument: "Guitar",
    name: "Vagner",
    experience: "12 years",
    from: "Rio de Janeiro",
    Genres: ["metal", "jazz", "pop"],
  }
  musician2 = {
    pic: "../../../assets/testPic2.png",
    instrument: "Bass",
    name: "Luiz",
    experience: "15 years",
    from: "Rio de Janeiro",
    Genres: ["raggae", "R&B", "pop"],
  }
  musicians: any = [this.musician1, this.musician2];

  index: number = 0;

  constructor() {}

  ngOnInit() {
    this.index = 0;
  }
  
  checkIndex(){
    if(this.index > this.musicians.length - 1){
      this.index = 0
    }
  }

  likeOrPass(like: boolean){
    if(like){
      console.log("match!")
    }
    this.index++;
    this.checkIndex();
  }
}
