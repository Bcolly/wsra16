<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<html>
<body>
 
  <p>Nire galderak</p>
    <table border="1">
		<thead><tr bgcolor="skyblue">
			<th>Galdera</th>
			<th>Erantzuna</th>
		</tr></thead>
	  
	<xsl:for-each select="assessmentItems/assessmentItem">
		<tr>
			<td><xsl:value-of select="itemBody/p"/><br/></td>
			<td><xsl:value-of select="correctResponse/value"/><br/></td>
		</tr>
	</xsl:for-each>
	</table>
</body>
</html>
</xsl:template>
</xsl:stylesheet>