import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-profile',
  templateUrl: './profile.page.html',
  styleUrls: ['./profile.page.scss'],
})
export class ProfilePage implements OnInit {

  //hardcoded data for tests
  musician = {
    pic: "../assets/testPic2.png",
    name: "username",
    instrument: "drum",
    experience: "8 years",
    from:"Rio de Janeiro",
    genres: ["samba", "jazz", "bossa nova"],


  }
  constructor() { }


  ngOnInit() {
  }

}
