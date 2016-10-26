<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<HTML><BODY>
	<p><b>Nire galderak</b></p>
	<TABLE border="1">
		<THEAD><TR><TH>GALDERA</TH><TH>KONPLEXUTASUNA</TH><TH>GAIA</TH></TR></THEAD>
			<xsl:for-each select="assessmentItems/assessmentItem" >
				<TR>
					<TD><FONT SIZE="2" COLOR="blue" FACE="Verdana">
					<xsl:value-of select="itemBody"/> <BR/>
					</FONT>
					</TD>
					<TD><FONT SIZE="2" COLOR="purple" FACE="Verdana">
					<xsl:value-of select="@complexity"/> <BR/>
					</FONT>
					</TD>
					<TD><FONT SIZE="2" COLOR="green" FACE="Verdana">
					<xsl:value-of select="@subject"/> <BR/>
					</FONT>
					</TD>
				</TR>
		</xsl:for-each>
	</TABLE>
	<p> <a href='../layout.html'> -=HOME=-</a> </p>
</BODY></HTML></xsl:template>
</xsl:stylesheet>