import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { element } from 'protractor';


@Component({
  selector: 'app-nav-bar',
  templateUrl: './nav-bar.component.html',
  styleUrls: ['./nav-bar.component.scss'],
})
export class NavBarComponent implements OnInit {

  constructor(private router: Router) {}  

  currentPage: String; //tells which page we are in.
  homeActivated:boolean = false;
  profileActivated:boolean = false;
  chatActivated:boolean = false;

  updateCurrentPage(){
    let fullRoute: string[] = this.router.url.split("/"); 
    this.currentPage = fullRoute[1];
  }

  //updates the states of the buttons 
  updateButtonHighlight(){
    
    if(this.currentPage == "home"){
      this.homeActivated = true;
      this.profileActivated = false;
      this.chatActivated = false;
    }
    if(this.currentPage == "profile"){
      this.homeActivated = false;
      this.profileActivated = true;
      this.chatActivated = false;
    }
    if(this.currentPage == "chat"){
      this.homeActivated = false;
      this.profileActivated = false;
      this.chatActivated = true;
    }
  }
  
  ngOnInit() {
    this.updateCurrentPage()
    this.updateButtonHighlight()
  }
}
