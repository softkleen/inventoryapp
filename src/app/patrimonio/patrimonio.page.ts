import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-patrimonio',
  templateUrl: './patrimonio.page.html',
  styleUrls: ['./patrimonio.page.scss'],
})
export class PatrimonioPage implements OnInit {

  constructor(private route:Router) { }

  ngOnInit() {
  }
  addPatrimonio(){
    this.route.navigate(['add-patrimonio']);
    //console.log('vamos add?.....');
  }

}
