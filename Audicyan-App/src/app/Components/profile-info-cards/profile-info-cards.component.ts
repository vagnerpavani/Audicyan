import { Component, OnInit, Sanitizer } from '@angular/core';
import { DomSanitizer } from '@angular/platform-browser'




@Component({
  selector: 'app-profile-info-cards',
  templateUrl: './profile-info-cards.component.html',
  styleUrls: ['./profile-info-cards.component.scss'],
})

export class ProfileInfoCardsComponent implements OnInit {

  constructor(private sanitizer: DomSanitizer) { }
  

  //hardcoded data for tests
  genres = ["samba", "jazz", "bossa nova"]
  skills = ["music theory", "music production"]
  material1 = this.sanitizer.bypassSecurityTrustResourceUrl("https://open.spotify.com/embed/track/5pRFseHNdKQgHAW5MQzCqb") 
  
  private materials = [this.material1]
  ngOnInit() {}

}

