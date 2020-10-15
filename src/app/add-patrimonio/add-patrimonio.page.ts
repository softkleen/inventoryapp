import { Component, OnInit } from '@angular/core';
import { StringifyOptions } from 'querystring';

@Component({
  selector: 'app-add-patrimonio',
  templateUrl: './add-patrimonio.page.html',
  styleUrls: ['./add-patrimonio.page.scss'],
})
export class AddPatrimonioPage implements OnInit {
id:number;
numero:string;
produto:string;
serie:string;
marca:string;
categoria:string;
valor:number;
situacao:string;
patrimonio:any[]=[];
  constructor() { }

  ngOnInit() {
  }

  incluir(){
    let itemPatrimonio = {
      numero:this.numero,
      produto:this.produto,
      marca:this.marca,
      serie:this.serie,
      categoria:this.categoria,
      valor:this.valor,
      situacao:this.situacao
    };
    this.patrimonio.push(itemPatrimonio);
    console.log(this.patrimonio);
  }

}
