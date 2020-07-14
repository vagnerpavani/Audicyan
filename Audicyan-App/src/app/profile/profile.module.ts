import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { ProfilePageRoutingModule } from './profile-routing.module';

import { ProfilePage } from './profile.page';
import { NavBarComponent } from '../Components/nav-bar/nav-bar.component';
import { ProfileInfoCardsComponent } from '../Components/profile-info-cards/profile-info-cards.component';


@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    ProfilePageRoutingModule
  ],
  declarations: [ProfilePage, NavBarComponent, ProfileInfoCardsComponent]
})
export class ProfilePageModule {}
