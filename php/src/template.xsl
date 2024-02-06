<xsl:transform version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html"/>
    <xsl:template match="/">
        <xsl:apply-templates select="student"/>
    </xsl:template>

    <xsl:template match="student">
        <article>
            <section>
                <label>Jméno: </label>
                <label><xsl:value-of select="jméno"/>  </label>
            </section>
            <section>
                <label>Příjmení: </label>
                <label><xsl:value-of select="přijmeni"/> </label>
            </section>
            <xsl:for-each select="absolovované_předměty/předmět">
               <section>
                   <xsl:apply-templates select="."/>
               </section>
            </xsl:for-each>
        </article>
    </xsl:template>
    <xsl:template match="předmět">
        <label>Název předmětu: </label>
        <label><xsl:value-of select="@název"/></label> <br/>
        <label>Zkratka: </label>
        <label><xsl:value-of select="@zkratka"/></label> <br/>
        <label>Semestr: </label>
        <label><xsl:value-of select="semestr"/></label> <br/>
        <label>Statut: </label>
        <label><xsl:value-of select="statut"/></label> <br/>
        <label>Kredity:</label>
        <label><xsl:value-of select="kredity"/></label> <br/>
        <label>Pokus: </label>
        <label><xsl:value-of select="pokus"/></label> <br/>
        <label>Hodnocení: </label>
        <label><xsl:value-of select="hodnocení"/></label> <br/>
        <label>Body: </label>
        <label><xsl:value-of select="body"/></label> <br/>
        <label>Datum: </label>
        <label><xsl:value-of select="datum"/></label> <br/>


    </xsl:template>
</xsl:transform>