CREATE TABLE tx_timeline_domain_model_timeline (
  uid int(11) NOT NULL auto_increment,
  pid int(11) DEFAULT '0' NOT NULL,

  title varchar(255) DEFAULT '' NOT NULL,
  display_mode int(11) DEFAULT '0' NOT NULL,
  description text,
  epochs int(11) DEFAULT '0' NOT NULL,

  l10n_parent int(11) DEFAULT '0' NOT NULL,
  l10n_diffsource mediumblob,

  PRIMARY KEY (uid),
  KEY parent (pid)
);

CREATE TABLE tx_timeline_domain_model_epoch (
  uid int(11) NOT NULL auto_increment,
  pid int(11) DEFAULT '0' NOT NULL,

  title varchar(255) DEFAULT '' NOT NULL,
  startdate int(11) DEFAULT '0' NOT NULL,
  enddate int(11) DEFAULT '0' NOT NULL,
  color varchar(255) DEFAULT '' NOT NULL,
  moments int(11) DEFAULT '0' NOT NULL,
  timeline int(11) DEFAULT '0' NOT NULL,

  l10n_parent int(11) DEFAULT '0' NOT NULL,
  l10n_diffsource mediumblob,

  PRIMARY KEY (uid),
  KEY parent (pid)
);

CREATE TABLE tx_timeline_domain_model_moment (
  uid int(11) NOT NULL auto_increment,
  pid int(11) DEFAULT '0' NOT NULL,

  title varchar(255) DEFAULT '' NOT NULL,
  description text,
  exact_day int(11) DEFAULT '0' NOT NULL,
  epoch int(11) DEFAULT '0' NOT NULL,

  l10n_parent int(11) DEFAULT '0' NOT NULL,
  l10n_diffsource mediumblob,

  PRIMARY KEY (uid),
  KEY parent (pid)
);
