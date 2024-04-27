class Wydarzenia {
  constructor(title, image, date) {
      this.title = title;
      this.image=image;
      this.date=date;
  }

  getInfo() {
      return `${this.title} - ${this.image} - ${this.date}`;
  }
}
  export default Wydarzenia;