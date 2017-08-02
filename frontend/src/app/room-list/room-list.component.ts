import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-room-list',
  templateUrl: './room-list.component.html',
  styleUrls: ['./room-list.component.css']
})
export class RoomListComponent implements OnInit {

  private roomList : Object[] = [{
    "id":"1",
    "tipeKamar":"Deluxe",
    "hargaKamar":550000,
  },
  {
    "id":"2",
    "tipeKamar":"Normal",
    "hargaKamar":400000,
  },
  {
    "id":"3",
    "tipeKamar":"Super Deluxe",
    "hargaKamar":700000,
  },
  {
    "id":"4",
    "tipeKamar":"Low",
    "hargaKamar":300000,
  },
]

  constructor() { }

  ngOnInit() {
  }

  booking(id){
    // fungsi Button
  }

}
