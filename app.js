var express = require("express"),
    bodyParser = require("body-parser"),
    mongoose = require("mongoose"),
    app = express();

app.set("view engine", "ejs");
app.use(bodyParser.urlencoded({extended: true}));
app.use(express.static(__dirname + "/public"));

app.get("/", function(req, res) {
  res.render("landing");
});

app.get("/index", function(req, res) {
  res.render("");
});

app.get("/pastores", function(req, res) {
  res.render("pastores");
});

app.get("/adoracion", function(req, res) {
  res.render("danza-adoracion");
});

app.get("/testimonios", function(req, res) {
  res.render("testimonios");
});

app.get("/ninos", function(req, res) {
  res.render("ninos");
});

app.get("/mujeres", function(req, res) {
  res.render("mujeres");
});

app.get("/varones", function(req, res) {
  res.render("varones");
});

app.set("port", 3000);
app.listen(app.get("port"), function() {
  console.log("Server Started...");
});
