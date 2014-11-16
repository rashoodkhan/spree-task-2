# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models, migrations


class Migration(migrations.Migration):

    dependencies = [
        ('registration', '0004_auto_20141116_1759'),
    ]

    operations = [
        migrations.AlterField(
            model_name='userprofile',
            name='lastLoginDate',
            field=models.DateTimeField(blank=True),
            preserve_default=True,
        ),
    ]
