class GdocsController < ApplicationController
  @@gdocs = {
    :bpel => "https://docs.google.com/document/d/1V7VkpvaZ1j2Et4YJmS53XJC7NHuqRhXoKTpy4cyr9Z4/pub?embedded=true",
    :java => "https://docs.google.com/file/d/0B46KhxnDeZbyME1oaHRaOWkybUk/preview",
    :javascript => "https://docs.google.com/document/d/13LCjWRGYFdwmQKiO4eJrsloXbi9s_zn0OvjEEeohUsU/pub?embedded=true",
    :jms => "https://docs.google.com/presentation/d/1iyl6Cr8btbWICMwxcw1O2ziVQVWZm0OAA1ezpWmgl8w/embed?start=false&loop=false",
    :jmseai => "https://docs.google.com/document/d/1GlQUbmmhQeVvUP_G_kytnpTKVkF5fCh1dYPLdYo8e54/pub?embedded=true",
    :postgresql => "https://docs.google.com/document/d/1HxUy7pmwYR0pgJlxQsIvsr9dKHU4fMjHliUZXboe7iI/pub?embedded=true",
    :resume => "https://docs.google.com/document/d/1MW3LRw1y0tDw5Bkv4f7l_B7qye5KsN7UM9FAYkMX8IA/pub?embedded=true",
    :unixshellscripting => "https://docs.google.com/document/d/117wi6lDrcrmpS2N8srZOYwPTMidFmcqbo_9VPKN-POA/pub?embedded=true",
    :webservices => "https://docs.google.com/presentation/d/1qzxYML0pxOkViOil9OZ4hPaNAWSVtm1KlW3ThxX4-tM/embed?start=false&loop=false", 
    :soaml => "https://drive.google.com/file/d/0B46KhxnDeZbyZ3FmcFFHQ2pKVlE/edit?usp=sharing",
  }
  
  def index
    @src = @@gdocs[params["d"].to_sym]
  end

  def certifications
  end
end
