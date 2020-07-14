import { Component, OnInit } from '@angular/core';




@Component({
  selector: 'app-profile-info-cards',
  templateUrl: './profile-info-cards.component.html',
  styleUrls: ['./profile-info-cards.component.scss'],
})

export class ProfileInfoCardsComponent implements OnInit {

  constructor() { }
  

  //hardcoded data for tests
  genres = ["samba", "jazz", "bossa nova"]
  skills = ["music theory", "music production"]
  material1 = "https://open.spotify.com/embed/track/5pRFseHNdKQgHAW5MQzCqb"
  
  private materials = []
  ngOnInit() {}

}

