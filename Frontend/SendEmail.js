var nodemailer = require('nodemailer');

var transporter = nodemailer.createTransport({
  service: 'gmail',
  auth: {
    user: 'ziad.shaker0@gmail.com',
    pass: 'zizo2002'
  }
});

var mailOptions = {
  from: 'ziad.shaker0@gmail.com',
  to: 'ziadfehr0@gmail.com',
  subject: 'ignore',
  text: `test`
};

transporter.sendMail(mailOptions, function(error, info){
  if (error) {
    console.log(error);
  } else {
    console.log('Email sent: ' + info.response);
  }
});