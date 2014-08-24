class SdocsController < ApplicationController
  @@sdocs = {
      :datastructures => 'http://www.slideshare.net/slideshow/embed_code/35889663',
  }

  def index
    @src = @@sdocs[params['d'].to_sym]
  end
end
