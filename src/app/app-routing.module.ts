import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AppComponent } from './app.component';
import { PersonalComponent } from './personal/personal.component';
import { ProfessionalComponent } from './professional/professional.component';
import { SkillsComponent } from './skills/skills.component';
import { HobbyComponent } from './hobby/hobby.component';
import { MilitaryComponent } from './military/military.component';

const routes: Routes = [
  {
    path: '', component: AppComponent, children: [
      { path: 'personal', component: PersonalComponent },
      { path: 'professional', component: ProfessionalComponent },
      { path: 'skill', component: SkillsComponent },
      { path: 'hobby', component: HobbyComponent },
      { path: 'miilitary', component: MilitaryComponent },
    ]
  }];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
