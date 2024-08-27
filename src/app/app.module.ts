import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { PersonalComponent } from './personal/personal.component';
import { HobbyComponent } from './hobby/hobby.component';
import { ProfessionalComponent } from './professional/professional.component';
import { EducationComponent } from './education/education.component';
import { SkillsComponent } from './skills/skills.component';
import { MilitaryComponent } from './military/military.component';

@NgModule({
  declarations: [
    AppComponent,
    PersonalComponent,
    HobbyComponent,
    ProfessionalComponent,
    EducationComponent,
    SkillsComponent,
    MilitaryComponent,
  ],
  imports: [
    BrowserModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
