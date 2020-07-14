import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { IonicModule } from '@ionic/angular';
import { FormsModule } from '@angular/forms';
import { HomePage } from './home.page';


import { HomePageRoutingModule } from './home-routing.module';
import { NavBarComponent } from '../Components/nav-bar/nav-bar.component';
import { PickerComponent } from '../Components/picker/picker.component';


  


@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    HomePageRoutingModule,
    

    

  ],
  declarations: [HomePage, NavBarComponent, PickerComponent]
})
export class HomePageModule {}
