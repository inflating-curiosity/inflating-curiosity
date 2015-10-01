/* eslint-env node */
'use strict';

var path = require('path');
var json = require('jsonfile');
var prompt = require('prompt');
var slug = require('slug');
var semverRegex = require('semver-regex');

var pfile = './package.json';
var bfile = './bower.json';
var p = json.readFileSync(pfile);
var b = json.readFileSync(bfile);

var defaultName = slug(__dirname.split(path.sep).pop());

prompt.start();
prompt.get([{
  name: 'name',
  pattern: /^[a-zA-Z0-9\-]+$/,
  message: 'Name must be only letters, numbers or dashes',
  default: defaultName,
  required: true
}, {
  name: 'version',
  conform: function (value) {
    return semverRegex().test(value);
  },

  message: 'version must be semver compilant',
  default: '0.0.0',
  required: true
}], function (err, result) {
  if (!err) {
    p.name = b.name = result.name;
    p.version = b.version = result.version;

    json.spaces = 2;
    json.writeFileSync(pfile, p);
    json.writeFileSync(bfile, b);
  }
});
